
@extends('admin.index')

@section('content')
    <div class="container">
<div class="col-sm-10 col-md-10">
    <div class="panel panel-default">
        <h1 class="panel-heading" ><strong>Details Reclamation</strong> </h1>
        <div id="widget1container" class="panel-body collapse in">
            <h2>Details</h2>
            <p><strong>Nom du Commercial:
                @foreach( $comm as $comm=>$key)
                {{$key->name}}
                </strong>
                @endforeach
            </p>
            @foreach($reclamation as $reclamation)
            <p><strong> Client:</strong> {{$reclamation->nom}} .    <strong> Contact:</strong>{{$reclamation->contact}}
                <strong> Motif:</strong>{{$reclamation->motif}} </p>
            <p><strong> Objet de la reclamtion:</strong>  </p>

                @endforeach

        </div>
    </div>
</div>
    </div>
    @endsection