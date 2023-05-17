let btn = document.getElementById('btn');
let form = document.querySelector('form');
let URI = 'http://localhost/SpUkM01-095/HelloWorldPHP';
/* let URI = 'http://localhost/SpUkM01-095/HelloWorldPHP';
btn.addEventListener('click', async (e) => {
    let res = await fetch(`${URI}/api.php?name=John&age=30`);
    let data = await res.json();
    console.log(data);
    });
 */
btn.addEventListener('click', async (e) => {
    let res = await fetch(`${URI}/api.php`);
    let data = await res.json();
    });
form.addEventListener('submit', async (e) => {
    e.preventDefault();
    let res = await fetch(`${URI}/api.php?name=${form.name.value}&age=${form.age.value}`);
    let data = await res.json();
    console.log(data);
    });
