const massDelBtn = document.querySelector('#delete-product-btn')

// form validation
const form = {
    sku: document.getElementById('sku'),
    name: document.getElementById('name'),
    price: document.getElementById('price'),
    productType: document.getElementById('productType'), 
    formMessages: document.getElementById('form-messages'),
    saveBtn: document.getElementById('save_product')
}

if(typeof(form.saveBtn) != 'undefined' && form.saveBtn != null) {
    form.saveBtn.addEventListener('click', (e) => {
        e.preventDefault()
        const request = new XMLHttpRequest()
        
        request.onload = () => {
            let resObject = null

            try{
                // console.log(request)
                resObject = JSON.parse(request.responseText)
            } catch (e){
                console.log('Could not parse JSON')
            }

            if(resObject){
                handleResponse(resObject)
            }       
        }
    
        let requestData = `sku=${form.sku.value}&productName=${form.name.value}&price=${form.price.value}`
        
        const selectProdType = form.productType
        let selectedValue = selectProdType.options[selectProdType.selectedIndex].value;
        if (selectedValue !== "select product type") {
            requestData += `&productType=${selectedValue}`
        }

        if (form.size !== undefined) {
            requestData += `&size=${form.size.value}`
        }
        if (form.weight !== undefined) {
            requestData += `&weight=${form.weight.value}`
        }
        if (form.height !== undefined) {
            requestData += `&height=${form.height.value}`
        }
        if (form.length !== undefined) {
            requestData += `&length=${form.length.value}`
        }
        if (form.width !== undefined) {
            requestData += `&width=${form.width.value}`
        }

        request.open('post', './processes/product.process.php')
        request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
        request.send(requestData)
    })
}

function handleResponse(resObject) {
    if(resObject.errors === false) {
        location.replace('index.php')
    } else {
        removeAllChildNodes(form.formMessages)

        resObject.messages.forEach((message) => {
            const li = document.createElement('li')
            li.textContent = message
            form.formMessages.appendChild(li)
        })
        
        form.formMessages.style.display = 'inline-block'
    }
}

function GetSelectedTextValue(productType) {
    // get product form element
    const productForm = document.getElementById("product_form")
    // get attribute div element
    const attribute = productForm.querySelector("#attribute")
    // get dvd, book and furniture template tags
    const dvd = document.querySelector("[data-type-dvd]")
    const book = document.querySelector("[data-type-book]")
    const furniture = document.querySelector("[data-type-furniture]")

    // store product value
    let selectedValue = productType.value;
    // remove all child node from attribute div
    removeAllChildNodes(attribute)

    // add selected product type to the form
    if(selectedValue=="book"){
        addTypeAttr(book)
        Object.assign(form, {weight: document.getElementById('weight')})
    }
    else if (selectedValue=="dvd"){
        addTypeAttr(dvd)
        Object.assign(form, {size: document.getElementById('size')})
    }
    else if (selectedValue=="furniture") {
        addTypeAttr(furniture)
        Object.assign(form, {
            height: document.getElementById('height'),
            width: document.getElementById('width'),
            length: document.getElementById('length')
        })
    }

    console.log(form.productType.value)
}

// add type template to the form
function addTypeAttr(type) {
    const card = type.content.cloneNode(true).children[0]
    attribute.appendChild(card)
}

// removes all child nodes
function removeAllChildNodes(parent) {
    while (parent.firstChild) {
        parent.removeChild(parent.firstChild);
    }
}

if(typeof(massDelBtn) != 'undefined' && massDelBtn != null) {
    massDelBtn.addEventListener('click', (e) => {
        // get all checkboxes
        let checkboxes = document.querySelectorAll('.delete-checkbox')

        console.log(checkboxes)
        const checkedIds = getCheckedIds(checkboxes) // get all checked ids

        // get product.process.php url from data attribute
        const url = new URL(e.target.dataset.url)
        // append all check ids to the url
        url.searchParams.append('ids', checkedIds)
        const newUrl = url.toString()
        console.log(newUrl)
        
        // if array not empty then go to the url
        if(checkedIds.length > 0) {
            window.location = newUrl
        }
        
    })
}

// get all checked ids and store in array
function getCheckedIds(checkboxes) {
    const checkedIds = []
    
    checkboxes.forEach((elm) => {
        if(elm.checked) {
            checkedIds.push(elm.parentNode.parentNode.parentNode.id)
        }
    });

    return checkedIds
}

// add card class when checked
function addCardClassOnChecked() {
    let checkboxes = document.querySelectorAll('.delete-checkbox')

    checkboxes.forEach((elm) => {
        elm.addEventListener('change', () => {
            if(elm.checked) {
              elm.parentNode.parentNode.parentNode.classList.add('card-checked')
            } else {
              elm.parentNode.parentNode.parentNode.classList.remove('card-checked')
            }          
        })
    })
}

addCardClassOnChecked()
