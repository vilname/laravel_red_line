const csrfToken = document.querySelector('meta[name="csrf-token"]').content

function changeFavoriteStatus(context, idProduct)
{
    let svgFavorite = context.querySelector('svg');

    fetch("/product-user/store", {
        method: "POST",
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({
            'productId': idProduct
        })
    })
        .then( (response) => {
            console.log('response', response);

            return response.json();
        })
        .then((data) => {
            if (data.success) {
                svgFavorite.style.fill = 'red';
            }
        });
}


