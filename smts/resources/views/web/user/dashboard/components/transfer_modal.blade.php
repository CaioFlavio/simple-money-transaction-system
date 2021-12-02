<div id="transfer_modal" class="modal">
    <div class="modal-content">
        <h4>Transferencia entre usuarios</h4>
        <div class="section">
            <div class="row">
                <form class="col s12" method="POST" onsubmit="transferFunds(event)">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="input-field col s12">
                            <input name="email" id="email" type="email" class="validate">
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input name="value" id="value" type="number" min="1" class="validate">
                            <label for="value">Valor</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <button class="btn waves-light" type="submit">Send
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
</div>
