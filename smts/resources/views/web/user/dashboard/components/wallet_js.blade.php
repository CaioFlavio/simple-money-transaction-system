<script>
    function parseJwt (token) {
        let base64Url = token.split('.')[1];
        let base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
        let jsonPayload = decodeURIComponent(atob(base64).split('').map(function(c) {
            return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
        }).join(''));

        return JSON.parse(jsonPayload);
    };

    async function addFunds () {
        let token = localStorage.getItem('token');
        let parsedToken = parseJwt(token);
        let user_id = parsedToken['sub'];
        const rawResponse = await fetch(`/api/users/${user_id}/funds/add`, {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${token}`
            },
            body: JSON.stringify({
                'value': 50,
                'description': 'Dashboard Front'
            })
        });
        const content = await rawResponse.json();
        await reloadBalance();
    };

    async function withdrawFunds () {
        let token = localStorage.getItem('token');
        let parsedToken = parseJwt(token);
        let user_id = parsedToken['sub'];
        const rawResponse = await fetch(`/api/users/${user_id}/funds/withdraw`, {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${token}`
            },
            body: JSON.stringify({
                'value': 50,
                'description': 'Dashboard Front'
            })
        });
        const content = await rawResponse.json();
        await reloadBalance();
    };

    async function reloadBalance()
    {
        let token = localStorage.getItem('token');
        let parsedToken = parseJwt(token);
        let user_id = parsedToken['sub'];
        const rawResponse = await fetch(`/api/users/${user_id}/funds/get`,{
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${token}`
            },
        });
        const content = await rawResponse.json();
        let formatter = new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'USD',
        });
        document.getElementById("balance").textContent= formatter.format(content.current_balance);
    }


    /**
     * Serialize all form data into a JSON string
     * (c) 2021 Chris Ferdinandi, MIT License, https://gomakethings.com
     * @param {HTMLFormElement} form The form to serialize
     * @returns {String} The serialized form data
     */
    function serializeJSON (form) {
        var obj = {};
        Array.prototype.slice.call(form.elements).forEach(function (field) {
            if (!field.name || field.disabled || ['file', 'reset', 'submit', 'button'].indexOf(field.type) > -1) return;
            if (field.type === 'select-multiple') {
                var options = [];
                Array.prototype.slice.call(field.options).forEach(function (option) {
                    if (!option.selected) return;
                    options.push(option.value);
                });
                if (options.length) {
                    obj[field.name] = options;
                }
                return;
            }
            if (['checkbox', 'radio'].indexOf(field.type) > -1 && !field.checked) return;
            obj[field.name] = field.value;
        });
        return JSON.stringify(obj, null, 2);
    }

    async function transferFunds (e) {
        e.preventDefault();
        let form = document.querySelector('form');
        let data = serializeJSON(form);
        let token = localStorage.getItem('token');
        let parsedToken = parseJwt(token);
        let user_id = parsedToken['sub'];
        const rawResponse = await fetch(`/api/users/${user_id}/funds/transfer`, {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${token}`
            },
            body: data
        });
        if (rawResponse.status == 401) {
            M.toast({html: 'Transference Unauthorized' });
        }

        if (rawResponse.status == 200) {
            M.toast({html: 'Transference Successful!' });
            location.reload();
        }

    };


    reloadBalance();
</script>
