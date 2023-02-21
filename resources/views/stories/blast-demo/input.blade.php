@storybook([
    'name' => 'Primary Input',
    'status' => 'readyForQA',
    'args' => [
        'value' => '',
        'placeholder' => 'type something...',
    ],
])

<x-blast-demo.input :value="$value" :placeholder="$placeholder"></x-blast-demo.input>

<style>
    input {
        background-color: #fff;
        width: 200px;
        height: 20px;
        border: 1px solid #ddd;
        padding: 20px
    }
</style>
