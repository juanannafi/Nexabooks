<div class="modal fade" id="createUser" tabindex="-1" role="dialog" aria-labelledby="createUserLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createUserLabel">Input Data User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body container-fluid">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama User</label>
                            <input autocomplete="off" required type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <label for="email" class="form-label" style="margin-top: 20px">Email</label>
                            <input autocomplete="off" required type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <label for="password" class="form-label" style="margin-top: 20px">Password</label>
                            <input autocomplete="off" required minlength="8" placeholder="minimal 8 characters" type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-danger" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn bg-gradient-success">Save</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
