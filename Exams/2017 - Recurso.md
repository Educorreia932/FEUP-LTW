# Exame 2017/2018 - Recurso

## Parte 1

1. Tenham o mesmo valor no atributo *name*.

2. `article.featured:first-child h2 { ... }`

3. Obter uma cookie de sessão enviada de forma insegura.

4. Só se a password for grande e complexa.

5. A comunicação é cifrada.

6. `if ($pos === false) echo "Not found";`

7. Um objecto.

8. child

## Parte 2

1. a)

| R1 | R2 | R3 | R4 | R5 | R6 |
|----|----|----|----|----|----|
| 2  | 4  | 3  | 4  | 3  | 3  |

1. b)

| Buy Bread | Learn Guitar | Pay Bills | Wash Car |
|-----------|--------------|-----------|----------|
| cyan      | magenta      | magenta   | magenta  |

1. c)

| Buy Bread | Learn Guitar | Pay Bills | Wash Car |
|-----------|--------------|-----------|----------|
| red       | blue         | blue      | magenta  |

2. a)

Washing the **washing machine while watching the washing machine washing washing**

2. b)

Washing the washing m**ac**hine while watching the washing machine washing washing

2. c)

W**ashing the wash**ing machine while watching the washing machine washing washing

2. d)

**Washing the washing machine while watching the washing machine washing washing**

2. e)

Washing the washing machine while watching the washing machine **washing** washing

2. f)

Washing the **washing machine while watching the washing machine washing wa**shing

3. a)

```js
let largeImage = document.querySelectorAll("div#photos img.large");
let images = document.querySelectorAll("div#photos ul li img");

for (let image of images) {
    image.addEventListener("click", function() {
        largeImage.src = "large/" + image.src;
    });
}
```

3. b)

```js
let loadMore = document.querySelector("div#photos a.load")
let imageList = document.querySelector("div#photos ul");

loadMore.addEventListener("click", function() {
    let request = new XMLHttpRequest();

    request.addEventListener("load", function() {
        let randomImages = JSON.parse(this.responseText);

        for (let randomImage of randomImages) {
            let item = document.createElement('li'); 

            let image = document.createElement('img'); 
            image.src = randomImage;

            item.appendChild(image);
            imageList.appendChild(item);
        }
    });

    request.open("GET", "getrandomimages.php", true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send();
})
```

4. a)

`//book/text()`

4. b)

`//book[@year>1900]/text()`

4. c)

4. d)
