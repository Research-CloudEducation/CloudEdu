@extends('layouts.app')

@section('navbar')

    @include('home.nav')
@endsection

@section('content')
</div>
<div data-sidebar-content="chat" class="chat-content-wrap">
    <div class="d-flex ps-3 pe-3 pt-2 pb-2 o-hidden box-shadow-1 chat-topbar">
        <a data-sidebar-toggle="chat" class="link-icon d-md-none">
            <i class="icon-regular i-Right ms-0 me-3"></i>
        </a>
        <div class="d-flex align-items-center">
            <img src="http://127.0.0.1:8001/assets/images/faces/13.jpg" alt=""
                class="avatar-sm rounded-circle me-2">
            <p class="m-0 text-title text-16 flex-grow-1">Frank Powell</p>
        </div>
    </div>

    <div class="chat-content perfect-scrollbar" data-suppress-scroll-x="true">
        <div class="d-flex mb-4">
            <div class="message flex-grow-1">
                <div class="d-flex">
                    <p class="mb-1 text-title text-16 flex-grow-1">Frank Powell</p>
                    <span class="text-small text-muted">25 min ago</span>
                </div>
                <p class="m-0">Do you ever find yourself falling into the “discount trap?</p>
            </div>
            <img src="http://127.0.0.1:8001/assets/images/faces/13.jpg" alt=""
                class="avatar-sm rounded-circle ms-3">
        </div>

        <div class="d-flex mb-4 user">
            <img src="http://127.0.0.1:8001/assets/images/faces/1.jpg" alt=""
                class="avatar-sm rounded-circle me-3">
            <div class="message flex-grow-1">
                <div class="d-flex">
                    <p class="mb-1 text-title text-16 flex-grow-1">Jhon Doe</p>
                    <span class="text-small text-muted">24 min ago</span>
                </div>
                <p class="m-0">Lorem ipsum dolor sit amet.</p>
            </div>
        </div>
        <div class="d-flex mb-4">
            <div class="message flex-grow-1">
                <div class="d-flex">
                    <p class="mb-1 text-title text-16 flex-grow-1">Frank Powell</p>
                    <span class="text-small text-muted">25 min ago</span>
                </div>
                <p class="m-0">Do you ever find yourself falling into the “discount trap?</p>
            </div>
            <img src="http://127.0.0.1:8001/assets/images/faces/13.jpg" alt=""
                class="avatar-sm rounded-circle ms-3">
        </div>
        <div class="d-flex mb-4 user">
            <img src="http://127.0.0.1:8001/assets/images/faces/1.jpg" alt=""
                class="avatar-sm rounded-circle me-3">
            <div class="message flex-grow-1">
                <div class="d-flex">
                    <p class="mb-1 text-title text-16 flex-grow-1">Jhon Doe</p>
                    <span class="text-small text-muted">24 min ago</span>
                </div>
                <p class="m-0">Lorem ipsum dolor sit amet.</p>
            </div>
        </div>

    </div>

    <div class="ps-3 pe-3 pt-3 pb-3 box-shadow-1 chat-input-area">
        <form class="inputForm">
            <div class="form-group">
                <textarea class="form-control form-control-rounded" placeholder="Type your message" name="message" id="message"
                    cols="30" rows="3"></textarea>
            </div>
            <div class="d-flex">
                <div class="flex-grow-1"></div>
                <button class="btn btn-icon btn-rounded btn-primary me-2">
                    <i class="i-Paper-Plane"></i>
                </button>
                <button class="btn btn-icon btn-rounded btn-outline-primary" type="button">
                    <i class="i-Add-File"></i>
                </button>
            </div>
        </form>
    </div>

</div>
@endsection