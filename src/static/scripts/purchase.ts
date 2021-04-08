class Catalogue extends HTMLTableElement {
    constructor() {
        super();
        this.createTHead();
        let header = new HTMLTableRowElement();
        let nameHeader = new HTMLTableHeaderCellElement();
        nameHeader.textContent = "Product Name";
        nameHeader.id = "catalogue_name_header"
        nameHeader.className = "catalogue_header"
        let priceHeader = new HTMLTableHeaderCellElement();
        priceHeader.textContent = "Price";
        priceHeader.id = "catalogue_price_header";
        priceHeader.classList.add("currency");
        let stockHeader = new HTMLTableHeaderCellElement();
        stockHeader.textContent = "Stock";
        stockHeader.id = "catalogue_stock_header";
        let storeHeader = new HTMLTableHeaderCellElement();
        storeHeader.textContent = "Store";
        storeHeader.id = "catalogue_store_header";
        header.append(nameHeader, priceHeader, stockHeader, storeHeader)
        this.tHead.append(header)
    }

    private shoppingCart = new ShoppingCart();

    public addToCart(product_id: number) {
        this.shoppingCart.addToCart(product_id);
    }
}

class CatalogueItem extends HTMLTableRowElement {
    get product_id(): number {
        return this._product_id;
    }
    private readonly _product_id: number;
    private _product_name: string;
    private _price: string;
    private _stock: number;
    private _store: string;

    constructor({id, product_name, price, stock, store}) {
        super();
        this._product_id = id;
        this._product_name = product_name;
        this._price = price;
        this._stock = stock;
        this._store = store;

        let nameCell = new HTMLTableDataCellElement();
        nameCell.textContent = product_name;
        let priceCell = new HTMLTableDataCellElement();
        priceCell.textContent = `$${price}`;
        priceCell.classList.add("currency");
        let stockCell = new HTMLTableDataCellElement();
        stockCell.textContent = stock;
        let storeCell = new HTMLTableDataCellElement();
        storeCell.textContent = store;
        let button = new HTMLButtonElement();
        button.textContent = "Add to Cart";
        button.onclick = () => {
            if (this.parentElement instanceof Catalogue) {
                this.parentElement.addToCart(this.product_id);
            }
        }

        this.append(nameCell, priceCell, stockCell, storeCell, button);
    }


}

class ShoppingCart extends HTMLTableElement {
    constructor() {
        super();
        // this.orders = [];
        this._header = this.createTHead();
    }
    private orders: Product[] = [];
    private _header: HTMLTableSectionElement;

    orderProducts() {
        let request = new XMLHttpRequest();

    }

    addToCart(product_id: Number) {
        const request = new XMLHttpRequest();
        const cart = this;

        request.onreadystatechange = function () {
            if (this.readyState === this.DONE && this.status === 200) {
                this.responseType = "json"
                let p = <ProductDetails>this.response
                cart.orders.concat(new Product(p))
            }
        }
    }

    removeItem(product: Product) {
        this.orders.splice(this.orders.indexOf(product), 1);
    }
}

class Product extends HTMLTableRowElement {
    get product_cost(): string {
        return this._product_cost;
    }

    set product_cost(value: string) {
        this._product_cost = value;
        this._product_cost_cell.textContent = `$${value}`;
    }
    get courier_id(): number {
        return this._courier_id;
    }

    set courier_id(value: number) {
        this._courier_id = value;
    }
    get product_id(): number {
        return this._product_id;
    }

    set product_id(value: number) {
        this._product_id = value;
        this._product_id_cell.textContent;
    }

    constructor({id, price}) {
        super();
        // this._product_id_cell = new HTMLTableDataCellElement();
        // this._courier_id_cell = new HTMLTableDataCellElement();
        // this._product_cost_cell = new HTMLTableDataCellElement();
        this._product_id = id;
        this.product_cost = price
        let deleteButton = new HTMLButtonElement();
        deleteButton.onclick = () => this.remove();
        this.append(this._product_id_cell, this._courier_id_cell);
    }

    remove() {
        if (this.parentElement instanceof ShoppingCart) this._shopping_cart.removeItem(this);
        super.remove();
    }

    private _shopping_cart: ShoppingCart;
    private _product_id: number;
    private _product_cost: string;
    private _courier_id: number;
    private readonly _product_id_cell: HTMLTableDataCellElement = new HTMLTableDataCellElement();
    private readonly _courier_id_cell: HTMLTableDataCellElement = new HTMLTableDataCellElement();
    private readonly _product_cost_cell: HTMLTableDataCellElement = new HTMLTableDataCellElement();
}

class ProductDetails {
    id
    name
    price
    stock
    store
}


