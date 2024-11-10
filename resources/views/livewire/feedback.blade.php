<div>
    
    <div class="container-fluid">

        <div class="row mt-3">
            <div class="col">
                <a class="btn btn-warning" href="/portofolio">Website Saya</a>
            </div>
        </div>

        <div class="row justify-content-center pt-2 pb-2 mt-1">
            <div class="col sliders d-flex flex-row">
                <div class="box-slide d-flex flex-row" style="--width: 100%;">
                    @foreach ($feedbacks as $key => $feedback)
                    <div class="slide">
                        <div class="row responsive" style="height: 100%">
                            <div class="col-md-4 kiri ps-3 pt-3" >
                                <img src="https://picsum.photos/100/100?random={{ rand() }}" class="random-image" alt="Random Image">
                            </div>
                            <div class="col-md-8 kanan" >
                                <table>
                                    <tr>
                                        <td>Name</td>
                                        <td>: </td>
                                        <td>{{ $feedback->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>: </td>
                                        <td>{{ $feedback->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Massage</td>
                                        <td>: </td>
                                        <td>{{ $feedback->message }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        @if (session()->has('success'))
            <div class="row">
                <div class="col d-flex flex-row justify-content-center">
                    <div class="alert alert-success mt-3" role="alert">
                        {{ session('success') }}
                    </div>
                </div>
            </div>
        @endif

        <div class="row justify-content-center pt-3 pb-3"> 
            <div class="col-md-4 box text-center">
                <h3 style="font-weight: bold;" class="mt-3">Formulir Feedback</h3>

                <div class="row">
                    <div class="col d-flex flex-row justify-content-center">
                        <hr style="border: none; width: 500px; height: 2px; background-color: #913436;">
                    </div>
                </div>

                <form onsubmit="return validateData()" wire:submit.prevent="submit" class="mt-3">
                    <div class="row">
                        <div class="col">
                            <input type="text" class="input-feedback" id="input-name" wire:model="name" placeholder="Full Name">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col d-flex flex-row justify-content-center">
                            <div wire:ignore.self class="alert alert-danger alert-dismissible fade show d-none" id="alert-name" role="alert">
                                Nama Tidak Boleh Kosong
                              </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="email" class="input-feedback" id="input-email" wire:model="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col d-flex flex-row justify-content-center">
                            <div wire:ignore.self class="alert alert-danger alert-dismissible fade show d-none" id="alert-email" role="alert">
                                Format Email Salah
                              </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <textarea class="text-massage" id="input-massage" wire:model="message">Message</textarea>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col d-flex flex-row justify-content-center">
                            <div wire:ignore.self class="alert alert-danger alert-dismissible fade show d-none" id="alert-message" role="alert">
                                Pesan Minimal 10 Karakter
                              </div>
                        </div>
                    </div>
                    <div class="row mt-2 justify-content-center">
                        <div class="col-md-4 d-flex flex-row justify-content-end" style="width: 520px;">
                            <button class="btn btn-submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

    @section('script')
    
        <script>
            
            
            function validateData() {

                const inputName = document.getElementById('input-name').value;
                const inputEmail = document.getElementById('input-email').value;
                const inputMassage = document.getElementById('input-massage').value;

                const alertName = document.getElementById('alert-name');
                const alertEmail = document.getElementById('alert-email');
                const alertMessage = document.getElementById('alert-message');
                
                let validate = true;

                // Validate Input Name
                if (inputName.trim() === "") {
                    // console.log('Nama Tidak Boleh Kosong');
                    alertName.classList.remove('d-none');
                    validate = false;
                } else {
                    console.log('Berhasil');
                    alertName.classList.add('d-none');
                }

                // Validate Input Email
                const patternEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                if (!patternEmail.test(inputEmail)) {
                    console.log("Format Email Salah");
                    alertEmail.classList.remove('d-none');
                    validate = false;
                } else {
                    console.log('Berhasil');
                    alertEmail.classList.add('d-none');
                }

                // Validate Massage
                if(inputMassage.trim().length < 10){
                    console.log("Pesan Minimal 10 Karakter")
                    alertMessage.classList.remove('d-none');
                    validate = false;
                }else{
                    console.log("Berhasil");
                    alertMessage.classList.add('d-none');
                }

                return validate;

            }

        </script>

    @endsection
</div>
