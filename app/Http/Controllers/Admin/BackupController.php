<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class BackupController extends Controller
{
    public function index()
    {
        $backups = [];
        $backupPath = storage_path('app/backups');

        if (File::exists($backupPath)) {
            $files = File::files($backupPath);
            foreach ($files as $file) {
                $backups[] = [
                    'name' => $file->getFilename(),
                    'size' => $this->formatSize($file->getSize()),
                    'date' => date('Y-m-d H:i:s', $file->getMTime()),
                    'path' => $file->getPathname()
                ];
            }
        }

        return view('admin.backup.index', compact('backups'));
    }

    public function create(Request $request)
    {
        $type = $request->get('type', 'database');

        try {
            if ($type == 'database') {
                $this->backupDatabase();
            } elseif ($type == 'files') {
                $this->backupFiles();
            } else {
                $this->backupDatabase();
                $this->backupFiles();
            }

            return redirect()->route('admin.backup')
                ->with('success', 'Backup created successfully!');

        } catch (\Exception $e) {
            return redirect()->route('admin.backup')
                ->with('error', 'Backup failed: ' . $e->getMessage());
        }
    }

    public function download($filename)
    {
        $path = storage_path('app/backups/' . $filename);

        if (!File::exists($path)) {
            abort(404);
        }

        return response()->download($path);
    }

    public function destroy($filename)
    {
        $path = storage_path('app/backups/' . $filename);

        if (File::exists($path)) {
            File::delete($path);
            return redirect()->route('admin.backup')
                ->with('success', 'Backup deleted successfully!');
        }

        return redirect()->route('admin.backup')
            ->with('error', 'Backup file not found!');
    }

    private function backupDatabase()
    {
        $backupPath = storage_path('app/backups');

        if (!File::exists($backupPath)) {
            File::makeDirectory($backupPath, 0755, true);
        }

        $filename = 'database-backup-' . date('Y-m-d-H-i-s') . '.sql';
        $command = sprintf(
            'mysqldump --user="%s" --password="%s" --host="%s" "%s" > "%s"',
            env('DB_USERNAME'),
            env('DB_PASSWORD'),
            env('DB_HOST'),
            env('DB_DATABASE'),
            $backupPath . '/' . $filename
        );

        exec($command);
    }

    private function backupFiles()
    {
        $backupPath = storage_path('app/backups');
        $filename = 'files-backup-' . date('Y-m-d-H-i-s') . '.zip';

        $zip = new \ZipArchive();
        $zipPath = $backupPath . '/' . $filename;

        if ($zip->open($zipPath, \ZipArchive::CREATE) === TRUE) {
            $this->addFolderToZip($zip, public_path('uploads'));
            $zip->close();
        }
    }

    private function addFolderToZip($zip, $folder, $zipFolder = '')
    {
        if (File::isDirectory($folder)) {
            $files = File::files($folder);
            foreach ($files as $file) {
                $zip->addFile($file->getPathname(), $zipFolder . $file->getFilename());
            }

            $directories = File::directories($folder);
            foreach ($directories as $directory) {
                $this->addFolderToZip($zip, $directory, $zipFolder . basename($directory) . '/');
            }
        }
    }

    private function formatSize($bytes)
    {
        if ($bytes >= 1073741824) {
            return number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            return number_format($bytes / 1024, 2) . ' KB';
        }

        return $bytes . ' bytes';
    }
}