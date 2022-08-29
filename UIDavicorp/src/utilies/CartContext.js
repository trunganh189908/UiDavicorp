import React, {createContext, useState} from "react";

import {getProduct} from './ProductData';


export const CartContext = createContext();

export function CartProvider(props){
    const [items, setItems] = useState([]);

    function addItemToCart(id){
        const product = getProduct(id);
        setItems((prevItems)=> {
            const item = prevItems.find((item) => (item.id == id));
            if(!item){
                return [...prevItems, {
                    id,
                    qty: 1,
                    product,
                    totalPrice: product.Price
                }];
            }
            else{
                return prevItems.map((item) => {
                    if(item.id == id) {
                        item.qty++;
                        item.totalPrice += product.Price;
                    }
                    return item;
                });
            }
            
        });
    }
    function getItemCount() {
        return items.reduce((sum, item) => ( sum + item.qty), 0);
    }
    function getTotalPrice() {
        return items.reduce((sum, item) => (sum + item.totalPrice), 0)
    }
    return (
        <CartProvider.Provider
        value={{items, setItems, getItemCount, getTotalPrice, addItemToCart}}
        >
        {props.children}
        </CartProvider.Provider>
    );
}