@extends('layouts.app')

@section('content')

    @include('snippet.sectionheader', ['title' =>'Artikel bearbeiten'])

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card"  style="margin-top:50px;margin-bottom: 50px;">
                    <div class="card-header">Artikel bearbeiten</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('postUpdate',$post->id) }}" enctype="multipart/form-data">
                            @csrf
                            @include('form.checkbox', ['title' =>__('Artikel anzeigen'),'name'=>'show_post','value'=>$post->show_post])
                            @include('form.upload', ['title' =>__('[1] - Image'),'name'=>'image1'])
                            @include('form.upload', ['title' =>__('[2] - Image'),'name'=>'image2'])
                            @include('form.upload', ['title' =>__('[3] - Image'),'name'=>'image3'])
                            @include('form.text', ['name' =>'title','title'=>__('Title'),'value'=>$post->title,'required'=>''])
                            @include('form.textarea', ['name' =>'text','title'=>__('Text'),'value'=>$post->text,'required'=>''])

                            <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('speichern') }}
                                    </button>
                                    <a class="btn btn-danger float-right" href="{{ route('postDelete',$post->id) }}" >
                                        {{ __('löschen') }}
                                    </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
