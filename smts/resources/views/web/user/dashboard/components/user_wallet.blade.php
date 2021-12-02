<div class="row">
    <div class="col s12">
        <table>
            <thead>
                <tr>
                    <th>Funds</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td><span id="balance">0.00</span></td>
                    <td>
                        <a class="waves-light btn" onclick="addFunds()">Add $ 50</a>
                        <a class="waves-light btn" onclick="withdrawFunds()">Withdraw $ 50</a>
                        <a class="waves-light btn modal-trigger" href="#transfer_modal">Transfer</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@include('web.user.dashboard.components.wallet_js')
