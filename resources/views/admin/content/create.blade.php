@extends('admin.layouts.app')

@section('title', 'المدارس | Dashboard')
@section('page_sub_title' , 'إدخال مادة    ')
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
                    <form method="post" action="{{ route('admin.contents.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
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
                            <x-input-label for="title" :value=" trans('form.title') " />
                            <x-text-input id="name" name="title" type="text" class="mt-1 block w-full" :value="old('title' )"  autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>
                        <div>
                            <x-input-label for="file" :value="trans('form.file') " />
                            <x-text-input id="file" name="file" type="file" class="mt-1 block w-full" :value="old('file')"  autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('file')" />
                        </div>
                        <div>
                            <x-input-label for="content" :value="trans('form.content') " />
                            <textarea id="content" name="content" type="text" class="mt-1 block w-full form-control" :value="old('content')"  autofocus autocomplete="name" cols="30" rows="10"></textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('content')" />
                        </div>
                        <div>
                            <x-input-label for="category_id" :value="trans('table.category-name') " />
                            <select name="category_id" id="" class="custom-select custom-select-lg mb-3">
                                <option selected></option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
                        </div>
                        <div>
                            <x-input-label for="class_id" :value="trans('form.classLevel') " />
                            <select name="class_id" id="" class="custom-select custom-select-lg mb-3">
                                <option selected></option>
                                @foreach ($classLevels as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('class_id')" />
                        </div>
                        <div>
                            <x-input-label for="teacher_id" :value="trans('table.upload-by') " />
                            <select name="teacher_id" id="" class="custom-select custom-select-lg mb-3">
                                <option selected></option>
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('teacher_id')" />
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