<div {{ $attributes->merge(['class' => 'card mb-3']) }}>
    <div class="card-body d-flex">
        <a href="/todos/{{$todo->id}}/toggle" class="btn mr-auto btn-outline-primary" style="border-radius: 0">&check;</a>
        <a href="/todos/{{$todo->id}}" class="btn btn-block btn-light" style="border-radius: 0">{{$todo->subject}}</a>
        <a href="/todos/{{$todo->id}}/delete" class="btn btn-outline-danger ml-autor" style="border-radius: 0">&times;</a>
    </div>
</div>
