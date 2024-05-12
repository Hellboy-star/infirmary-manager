@extends('def.def', ['titre'=>'Régistre d\'Aptitude' ])
@section ('contenta')

<div id="content" class="app-content">




    <div>
        <h1></h1>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <!-- <iframe src="{{asset('assets')}}/{{$id->FILE}}" width="100%" height="100%" frameborder="0"></iframe> -->
                    <object data="{{asset('assets')}}/{{$id->FILE}}" type="application/pdf" width="100%" height="600">
                      <!-- <p>Il semble que vous n'ayez pas de plugin PDF pour ce navigateur. Vous pouvez <a href="{{asset('assets')}}/{{$id->FILE}}">télécharger le fichier PDF</a> au lieu.</p> -->
                    </object>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection