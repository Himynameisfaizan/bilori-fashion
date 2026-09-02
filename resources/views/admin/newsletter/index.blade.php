@extends('admin.layout.app')

@section('title', 'Newsletter Subscribers')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Newsletter Subscribers</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                        data-target="#sendCampaignModal">
                        <i class="fas fa-envelope"></i> Send Campaign
                    </button>
                    <a href="{{ route('admin.newsletter.export') }}" class="btn btn-success btn-sm">
                        <i class="fas fa-download"></i> Export
                    </a>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Subscribed Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($subscribers as $subscriber)
                            <tr>
                                <td>{{ $subscriber->id }}</td>
                                <td>{{ $subscriber->email }}</td>
                                <td>
                                    <span class="badge badge-{{ $subscriber->status == 'subscribed' ? 'success' : 'danger' }}">
                                        {{ ucfirst($subscriber->status) }}
                                    </span>
                                </td>
                                <td>{{ $subscriber->subscribed_at ? $subscriber->subscribed_at->format('Y-m-d H:i') : $subscriber->created_at->format('Y-m-d H:i') }}
                                </td>
                                <td>
                                    <form action="{{ route('admin.newsletter.destroy', $subscriber->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No subscribers found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-3">
                    {{ $subscribers->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Send Campaign Modal -->
    <div class="modal fade" id="sendCampaignModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.newsletter.send') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Send Newsletter Campaign</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Subject</label>
                            <input type="text" name="subject" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <textarea name="content" rows="5" class="form-control" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Send Campaign</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection