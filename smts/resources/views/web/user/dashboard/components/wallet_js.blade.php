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
    reloadBalance();
</script>
