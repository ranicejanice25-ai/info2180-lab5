window.addEventListener( 'load', () =>
{
    const input = document.getElementById('country');
    const result = document.getElementById('result');

    function search(extra = '')
    {
        fetch(`world.php?country=${encodeURIComponent(input.value)}${extra}`)
        .then(response => response.text())
        .then(data => {result.innerHTML = data; });
    }

    document.getElementById('lookup').addEventListener('click', () => search());
    document.getElementById('lookup-cities').addEventListener('click', () => search('&lookup=cities'));
});