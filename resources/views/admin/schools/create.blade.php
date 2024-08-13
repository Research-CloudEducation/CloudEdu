@extends('admin.layouts.app')

@section('title', 'المدارس | Dashboard')
@section('page_sub_title' , 'إنشـاء مدرسة  او معهـد')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Link 1</a></li>
    <li class="breadcrumb-item active">Link 2</li>
@endsection

@section('content')
 <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
                <section>
                    <form method="post" action="{{ route('admin.schools.store') }}" class="mt-6 space-y-6">
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
                        <div>
                            <x-input-label for="ar_name" :value=" trans('form.name_ar') " />
                            <x-text-input id="name" name="name_ar" type="text" class="mt-1 block w-full" :value="old('ar_name' )"  autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name_ar')" />
                        </div>
                
                        <div>
                            <x-input-label for="en_name" :value="trans('form.name_en') " />
                            <x-text-input id="name" name="name_en" type="text" class="mt-1 block w-full" :value="old('name_en')"  autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name_en')" />
                        </div>
                        <div>
                            <x-input-label for="description_ar" :value="trans('form.desc_ar') " />
                            <x-text-input id="text" name="description_ar" type="text" class="mt-1 block w-full" :value="old('dessription_ar')"  autocomplete="description_ar" />
                            <x-input-error class="mt-2" :messages="$errors->get('description_ar')" />
                        </div>
                        <div>
                            <x-input-label for="description_en" :value="trans('form.desc_en') " />
                            <x-text-input id="text" name="description_en" type="text" class="mt-1 block w-full" :value="old('dessription_en')" autocomplete="description_en" />
                            <x-input-error class="mt-2" :messages="$errors->get('description_en')" />
                        </div>
                        <div>
                            <x-input-label for="address" :value="trans('form.address') " />
                            <x-text-input id="text" name="address" type="text" class="mt-1 block w-full" :value="old('address')"  autocomplete="address" />
                            <x-input-error class="mt-2" :messages="$errors->get('address')" />
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