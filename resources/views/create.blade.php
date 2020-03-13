@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create A To-Do</div>

                    <div class="card-body">
                        <form method="post" class="form">
                            @csrf
                            <div class="form-group">
                                <label class="control-label" for="subject">Subject*</label>
                                <input type="text" name="subject" id="subject" class="form-control"
                                       placeholder="Enter the subject of your to-do item here." required>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="content">Content</label>
                                <textarea name="content" id="content" class="form-control w-100" rows="5"
                                          placeholder="Enter the content of your to-do item here."></textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="tags">Tags</label>
                                <select class="select2 form-control" id="tags" name="tags[]" multiple="multiple"
                                        data-tags="true" data-placeholder="Select your tags" data-allow-clear="true"
                                        data-token-separators="[',', ' ']">
                                    <?php /** @var Tag[] $tags */ ?>use Spatie\Tags\Tag;
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->name }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="due_at">Date Due</label>
                                <input type="datetime-local" name="due_at" id="due_at" class="form-control">
                            </div>
                            <p class="small text-danger">*Required</p>
                            <div class="form-group d-flex">
                                <input type="reset" class="btn btn-outline-secondary ml-auto mr-5">
                                <input type="submit" class="btn btn-outline-primary mr-auto mr-5">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
