let form = document.querySelector('form');

form.addEventListener('submit', async (e) => {
    e.preventDefault();
    let myHeaders = new Headers({"Content-Type": "application/json"});
    let data = Object.fromEntries(new FormData(e.target));
    let config = {
        method: 'POST',
        headers: myHeaders,
        body: JSON.stringify(data)
    };
    let res = await fetch("api.php", config).then(res => res.text());
    document.querySelector('pre').innerHTML = res;
});