@props(['subject', 'content', 'context'])

<div {{ $attributes->merge(['class' => "alert alert-$context"]) }}>
    <strong>{{ $subject }}</strong> {{ $content }}
</div>
