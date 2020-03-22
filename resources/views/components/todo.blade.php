<div {{ $attributes->merge(['class' => 'card mb-3']) }}>
    <div class="card-body">
        <div class="d-flex">
            <a href="/todos/{{$todo->id}}/toggle" class="btn mr-auto btn-outline-primary" style="border-radius: 0">&check;</a>
            <a href="/todos/{{$todo->id}}" class="btn btn-block btn-light" style="border-radius: 0">{{$todo->subject}}</a>
            <a href="/todos/{{$todo->id}}/delete" class="btn btn-outline-danger ml-autor" style="border-radius: 0">&times;</a>
        </div>

        <h5 class="mt-2 mb-0">
            @foreach($todo->tags as $tag)
                <span class="badge badge-pill badge-info text-light font-weight-lighter mt-2">{{ $tag->name }}</span>
            @endforeach
        </h5>
    </div>
</div>
