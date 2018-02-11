
@extends('admin.index')
@section('content')


    <div id="modal-container">
        <div class="modal-background">
            <div class="modal">
                <h2>I'm a Modaljjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj</h2>
                <p>Hear me roar.kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk</p>
                <h2>I'm a Modaljjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj</h2>
                <p>Hear me roar.kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk</p>
                <h2>I'm a Modaljjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj</h2>
                <p>Hear me roar.kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk</p>
                <h2>I'm a Modaljjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj</h2>
                <p>Hear me roar.kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk</p>
                <h2>I'm a Modaljjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj</h2>
                <p>Hear me roar.kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk</p>
                <h2>I'm a Modaljjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj</h2>
                <p>Hear me roar.kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk</p>
                <h2>I'm a Modaljjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj</h2>
                <p>Hear me roar.kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk</p>


            </div>
        </div>

    </div>



    <div class="content1">
        <h1>Bon a Savoir</h1>
        <div class="buttons">

            <div id="five" class="button">Meep Meep</div>

        </div>
    </div>


    <script>
        $('.button').click(function(){
            var buttonId = $(this).attr('id');
            $('#modal-container').removeAttr('class').addClass(buttonId);
            $('body').addClass('modal-active');
        })

        $('#modal-container').click(function(){
            $(this).addClass('out');
            $('body').removeClass('modal-active');
        });
    </script>





@endsection




