@extends('layouts.auth')

@section('content')

<div class="page-content page-auth" id="register">
    <div class="section-store-auth" data-aos="fade-up">
        <div class="container">
            <div class="row align-items-center justify-content-center row-login">
                <div class="col-lg-4">
                    <h2>
                        Memulai untuk jual beli <br />
                        dengan cara terbaru
                    </h2>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        {{-- Name --}}
                        <div class="form-group">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" v-model="name" type="text" name="name"
                                :value="old('name')" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <!-- Email Address -->
                        <div class="form-group">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" v-model="email" type="email" name="email"
                                :value="old('email')" required />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <!-- Password -->
                        <div class="form-group">
                            <x-input-label for="password" :value="__('Password')" />

                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                                required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-group">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                name="password_confirmation" required />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="form-group">
                            <label>Store </label>
                            <p class="text-muted">Apakah anda juga ingin membuka toko?</p>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" name="is_store_open" id="openStoreTrue"
                                    v-model="is_store_open" :value="true" />
                                <label for="openStoreTrue" class="custom-control-label">Iya, boleh</label>
                            </div>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" name="is_store_open"
                                    id="openStoreFalse" v-model="is_store_open" :value="false" />
                                <label for="openStoreFalse" class="custom-control-label">Engga, Makasih</label>
                            </div>
                        </div>

                        <div class="form-group" v-if="is_store_open">
                            <label>Nama Toko </label>
                            <x-text-input id="store_name" class="block mt-1 w-full" v-model="store_name" type="text"
                                name="store_name" :value="old('store_name')" required />
                            <x-input-error :messages="$errors->get('store_name')" class="mt-2" />
                        </div>
                        <div class="form-group" v-if="is_store_open">
                            <label>Kategori </label>

                            <x-select id="select" class="block w-full" name="categories_id">
                                <option value="" selected disabled hidden>{{ __('Choose an option') }}</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </x-select>
                        </div>
                        <div>
                            <button class="btn btn-success btn-block mt-4">
                                {{ __('Register') }}
                            </button>
                            <a href="{{ route('login') }}" class="btn btn-signup btn-block mt-4">Back to Sign In</a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('addon-script')
<script src="/vendor/vue/vue.js"></script>
<!-- Memunculkan pop-up error -->
<script src="https://unpkg.com/vue-toasted"></script>
<script>
    Vue.use(Toasted);

      var register = new Vue({
        el: "#register",
        mounted() {
          AOS.init();
        //   this.$toasted.error(
        //     "Maaf, tampaknya email sudah terdaftar pada sistem kami.",
        //     {
        //       position: "top-center",
        //       className: "rounded",
        //       duration: 1000,
        //     }
        //   );
        },
        data: {
          name: "Farid Azhari",
          email: "farid123@gmail.com",
          password: "",
          is_store_open: true,
          store_name: "",
        },
      });
</script>

<!-- Scripts -->
@vite(['resources/css/app.css', 'resources/js/app.js'])
@endpush