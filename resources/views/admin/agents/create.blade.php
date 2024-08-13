@extends('admin.layouts.app')

@section('title', 'المدارس | Dashboard')
@section('page_sub_title', 'إضافة وكيل جديد ')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Link 1</a></li>
    <li class="breadcrumb-item active">Link 2</li>
@endsection

@section('content')
 <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-3xl">
                <section>
                    <form method="post" action="{{ route('admin.agents.store') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('post')
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @elseif (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
   
                          <div class="row">
                            <div class="col">
                                <div >
                                    <x-input-label for="name_ar" :value=" trans('form.name_ar') " />
                                    <x-text-input id="name" name="name_ar" type="text" class="mt-1 block w-full" :value="old('name_ar' )"  autofocus autocomplete="name" />
                                    <x-input-error class="mt-2" :messages="$errors->get('name_ar')" />
                                </div>
                            </div>
                            
                            <div class="col">
                                <div>
                                    <x-input-label for="name_en" :value="trans('form.name_en')  "  /> 
                                    <x-text-input id="name" name="name_en" type="text" class="mt-1 block w-full" :value="old('name_en')"  autofocus autocomplete="name" />
                                    <x-input-error class="mt-2" :messages="$errors->get('name_en')" />
                                </div>
                            </div>
                                
                          </div>
  
                        <div>
                            <x-input-label for="email" :value="trans('form.email') " />
                            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email')"  autocomplete="email" />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>
                        <div>
                            <x-input-label for="password" :value="trans('form.password') " />
                            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" :value="old('password')" autocomplete="new-password" />
                            <x-input-error class="mt-2" :messages="$errors->get('password')" />
                        </div>
                        <div>
                            <x-input-label for="password" :value="trans('form.confirmpassword') " />
                            <x-text-input id="password" name="password_confirmation" type="password" class="mt-1 block w-full" :value="old('password')" autocomplete="new-password" />
                            <x-input-error class="mt-2" :messages="$errors->get('password')" />
                        </div>
                        <div>
                            <x-input-label for="description_en" :value="trans('form.phone') " />
                            <x-text-input id="text" name="phone" type="text" class="mt-1 block w-full" :value="old('phone')" autocomplete="phone" />
                            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                        </div>
                        <div>
                            <x-input-label for="address" :value="trans('form.address') " />
                            <x-text-input id="text" name="address" type="text" class="mt-1 block w-full" :value="old('address')"  autocomplete="address" />
                            <x-input-error class="mt-2" :messages="$errors->get('address')" />
                        </div>
                        <div>
                            <x-input-label for="description_en" :value="trans('form.FromSchool') " />
                            <select name="school_id" id="" class="custom-select custom-select-lg mb-3">
                                <option selected></option>
                                @foreach ($schools as $school)
                                    <option value="{{ $school->id }}">{{ $school->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('school_id')" />
                        </div>
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ trans('form.create') }}</x-primary-button>
                
                        
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
 </div>
     
@endsection