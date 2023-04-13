@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Add information</div>
                  
                <div class="card-body">
                <form  name="Sampleform" id="Sampleform" method="POST" enctype="multipart/form-data" action="javascript:void(0)">
                        @csrf
                        <!-- name -->
                        <div class="form-group row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- email -->
                        <div class="form-group row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- number -->
                        <div class="form-group row mb-3">
                            <label for="number"  class="col-md-4 col-form-label text-md-right">{{ __('Mobile Number') }}</label>

                            <div class="col-md-6">
                                <input id="number" type="number" min="10"  class="form-control @error('number') is-invalid @enderror" name="number" value="{{ old('number') }}" required autocomplete="number" autofocus>

                                @error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- whatsapp_number -->
                        <div class="form-group row mb-3 ">
                            <label for="whatsapp_number" class="col-md-4 col-form-label text-md-right">{{ __('Whatsapp Number') }}</label>

                            <div class="col-md-6">
                                <input id="whatsapp_number" type="number" min="10" class="form-control @error('whatsapp_number') is-invalid @enderror" name="whatsapp_number" value="{{ old('whatsapp_number') }}" required autocomplete="whatsapp_number" autofocus>

                                @error('whatsapp_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- value -->
                        <div class="form-group row mb-3">
                            <label for="value" class="col-md-4 col-form-label text-md-right">{{ __('Value') }}</label>

                            <div class="col-md-6">
                               <select name="value" class="form-control" required id="value">
                                        <option disabled selected value="">Please Select a value</option>   
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">three</option>
                               </select>
                                @error('value')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- url -->
                        <div class="form-group row mb-3">
                            <label for="url" class="col-md-4 col-form-label text-md-right">{{ __('url') }}</label>

                            <div class="col-md-6">
                                <input id="url" type="url" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') }}" required autocomplete="url" autofocus>

                                @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                

                        <div class="form-group row  mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-submit">
                                    {{ __('Add') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div  class="alert dismissible sticky-bottom fade show m-3" style="display:none;" role="alert">
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script>

   
    $('#Sampleform').on("submit",function(e) {
        event.preventDefault()
        var name = document.getElementById("name").value;
        var email = document.getElementById("email").value;
        var number = document.getElementById("number").value;
        var whatsapp_number = document.getElementById("whatsapp_number").value;
        var value = document.getElementById("value").value;
        var url = document.getElementById("url").value;
        var data = {
                'name': name,
                'email':  email,
                'number':  number,
                'whatsapp_number':  whatsapp_number,
                'value':  value,
                'url': url,
            }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        console.log("hi");
        $.ajax({
                type: "POST",
                url: "api/sheets",
                data: data,
                dataType: "json",
                success: function (response) {
                    if (response.message == "Success") {
                        // console.log(response);
                        $('.alert').addClass('alert alert-success');
                        $('.alert').append(
                            "<h4 class='alert-heading'>" + response.message + "!</h4><p>you have successfully added the data to the sheets</p>"
                        ); 
                        $(".alert").show('medium');
                        setTimeout(function(){
                            $(".alert").hide('medium');
                        }, 5000);

                    } else {
                        // console.log(response);
                        $('.alert').addClass('alert alert-danger');
                        $('.alert').append(
                            "<h4 class='alert-heading'>" + response.message +"!</h4>"
                        ); 
                        $.each(response.errors, function (key, err_value) {
                            $('.alert').append('<li>' + err_value + '</li>');
                        });
                        $(".alert").show('medium');
                        setTimeout(function(){
                            $(".alert").hide('medium');
                        }, 5000);
                    }
                }
            });
    

    })

</script>
@endsection
