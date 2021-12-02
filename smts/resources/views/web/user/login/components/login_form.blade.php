<div class="container">
    <div class="section">
        <div class="row">
            <div class="col s12">
                <h1>SIGN-UP</h1>
            </div>
        </div>
        <div class="row">
            <form class="col s12" method="POST" onsubmit="newUser(event)">
                {{ csrf_field() }}
                <div class="row">
                    <div class="input-field col s12">
                        <input name="email" id="email" type="email" class="validate">
                        <label for="email">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input name="password" id="password" type="password" class="validate">
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <button class="btn waves-effect waves-light" type="submit">Register
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
