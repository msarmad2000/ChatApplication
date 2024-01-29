<div>
    <div class="mb-4 mb-md-0" wire:poll="refreshMessages">
        <div class="row">
            <div class="col-5">
                <h5 class="font-weight-bold mb-3 text-center">Member</h5>
                <div class="card mask-custom">
                    <div class="card-body">
                        @foreach ($chats as $chat)
                            <ul class="list-unstyled mb-0">
                                <li class="p-2 border-bottom">
                                <a href="#!" class="d-flex justify-content-between {{$chat->id == $activeChat->id ? 'text-success' : ''}}" wire:click="navigationClicked('{{$chat->id}}')">
                                    <div class="d-flex flex-row">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-8.webp" alt="avatar"
                                        class="rounded-circle d-flex align-self-center me-3 shadow-1-strong" width="60">
                                    <div class="pt-1">
                                        <p class="fw-bold mb-0">
                                            @if($chat->IsGroupChat())
                                                {{$chat->name}}
                                            @else
                                                @foreach ($chat->users()->where('users.id','<>',Auth::user()->id)->get() as $user)
                                                {{$user->name}}
                                                @endforeach
                                            @endif

                                        </p>
                                        <p class="small">Hello, Are you there?</p>
                                    </div>
                                    </div>
                                    <div class="pt-1">
                                    <p class="small mb-1">Just now</p>
                                    <span class="badge bg-danger float-end">1</span>
                                    </div>
                                </a>
                                </li>
                            </ul>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-7">
                <ul class="list-unstyled ">
                    @foreach (($activeChat->messages) as $message)
                        @if($message->isAuthenticatedUsers())
                            <li class="d-flex justify-content-between mb-4">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp" alt="avatar"
                                    class="rounded-circle d-flex align-self-start me-3 shadow-1-strong" width="60">
                                <div class="card mask-custom">
                                    <div class="card-header d-flex justify-content-between p-3">
                                        <p class="fw-bold mb-0">
                                            {{$message->user->name}}
                                        </p>
                                        <p class="small ml-2"><i class="far fa-clock"></i> 12 mins ago</p>
                                        <p class="small ml-2">
                                            <i class="fas fa-edit" wire:click='editMessage({{ $message->id }})'></i>
                                            <i class="fa fa-trash" aria-hidden="true" wire:click="delete"></i>
                                        </p>
                                    </div>
                                    <div class="card-body">
                                    <p class="mb-0">
                                        @if($message->id == $this->editMessageId)
                                            {{dd('i am here')}}
                                        @else
                                            {{$message->messages}}
                                        @endif
                                    </p>
                                    </div>
                                </div>
                            </li>
                        @else
                            <li class="d-flex justify-content-between mb-4">
                                <div class="card mask-custom w-100">
                                    <div class="card-header d-flex justify-content-between p-3">
                                        <p class="fw-bold">
                                            {{$message->user->name}}
                                        </p>
                                        <p class="small mb-0"><i class="far fa-clock"></i> 13 mins ago
                                        </p>
                                    </div>
                                    <div class="card-body">
                                        <p class="mb-0">
                                            {{$message->messages}}
                                        </p>
                                    </div>
                                </div>
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-5.webp" alt="avatar"
                                    class="rounded-circle d-flex align-self-start ms-3 shadow-1-strong" width="60">
                            </li>
                        @endif
                    @endforeach

                    <form wire:submit.prevent="sendMessage">
                        <li class="mb-3">
                        <div class="form-outline form-white">
                            <textarea class="form-control" id="textAreaExample3" rows="4" wire:model="message"></textarea>
                            <label class="form-label" for="textAreaExample3">Message</label>
                        </div>
                        </li>
                        <button type="submit" class="btn btn-light btn-lg btn-rounded float-end">Send</button>
                    </form>
                </ul>
            </div>
        </div>

    </div>
</div>
