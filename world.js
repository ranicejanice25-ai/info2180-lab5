window.addEventListener( 'load', () =>
{
    const input = document.getElementById('country');
    const result = document.getElementById('result');

    document.getElementById('lookup').addEventListener('click', () =>
    {
        fetch(`world.php?country=${encodeURIComponent(input.value)}`)
        .then(response => response.text())
        .then(data => {result.innerHTML = data;});
    });
});