<div class="container">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">CREAR NOTA</button>
</div>


{!! Form::open(['url'=> 'notas/todas']) !!}

{{ Form::token() }}

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">NUEVA NOTA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name"  class="col-form-label">TITULO:</label>
            <input type="text" class="form-control" name="titulo" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">TEXTO:</label>
            <textarea class="form-control" name="texto" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
        <button type="submit" class="btn btn-primary">GUARDAR NOTA</button>
      </div>
    </div>
  </div>
</div>

{!! Form::close() !!}
