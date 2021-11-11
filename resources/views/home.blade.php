@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('User') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                       <table id="table_id" class="display stripe row-border">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>type_user</th>     
                                <th>Number</th>
                                <th>cedula</th>
                                <th>code_city</th>     
                                <th>birth_date</th> 
                            </tr>
                        </thead>
                        <tbody id="user_content">
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <button type="button" onclick="edith()" class="btn btn-primary"><strong>Edith</strong></button>
            </div>
            <div class="col-md-2">
                <button type="button" onclick="delete_user()" class="btn btn-danger"><strong>Delete</strong></button>

            </div>
        </div>
    </div>
</div>
<!-- Modal Edit user -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edith User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
           
        <input id="id_user" type="text"  hidden>

            <div class="form-group row" style="margin-bottom: 10px">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                <div class="col-md-6">
                    <input id="name_edit" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>  
            <div class="form-group row"  style="margin-bottom: 10px">
                <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Type User') }}</label>
                    <div class="col-md-6">
                        <select class="form-control" id="type_edith" name="type">
                          <option value="0">User</option>
                            <option value="1">Admin</option>
                        </select>
                </div>
            </div> 
            <div class="form-group row"  style="margin-bottom: 10px">
                 <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                <div class="col-md-6">
                        <input id="phone_edith" type="number" maxlength="10" minlength="10" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="phone" autofocus>

                         @error('name')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                         </span>
                     @enderror
                </div>
            </div>
            <div class="form-group row"  style="margin-bottom: 10px">
                <label for="Code" class="col-md-4 col-form-label text-md-right">{{ __('Code') }}</label>
                <div class="col-md-6">
                   <input id="Code_edith" type="number" class="form-control @error('Code') is-invalid @enderror" name="Code" value="{{ old('Code') }}" required autocomplete="phone" autofocus>
                    @error('Code')
                   <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
           </div>
           
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" onclick="save()" class="btn btn-primary">Save changes</button>
        </div>
       
    </div>
  </div>
</div>
<script type="text/javascript" src="{{asset('js/user.js')}}"> </script>
@endsection
