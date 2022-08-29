import React, { useContext } from 'react';
import {TouchableOpacity, View, Text, StyleSheet } from 'react-native';
import { CartContext } from '../utilies/CartContext';


export function CartIcon({navigation}) {
  const {getItemsCount} = useContext(CartContext);
  return (
    <View style={styles.buttonCart}>
    <TouchableOpacity style={styles.container}>
    <Image
      style={styles.iconCart}
     source={require('../Image/addCart.png')}/>
      <Text style={styles.text} 
        onPress={() => {
          navigation.navigate('Cart');
        }}
      > ({getItemsCount()})</Text>
    </TouchableOpacity>
    </View>
  );
}
const styles = StyleSheet.create({
  container: {
    width: 24,
    height: 16,
    marginLeft: 30,
    borderRadius: 50,
    padding: 10,
    flexDirection: 'column',
    justifyContent: 'center',
    alignItems: 'center',
    position: 'absolute',
    backgroundColor: 'F64D4D',
  },
  text: {
    color: 'white',
    fontWeight: 'bold',
    fontSize: 10,
    fontWeight: '600',
    lineHeight: 12.91,
    width: 6,
    height: 12,
  },
  iconCart:{
    width: 21.67,
    height: 20.36,
    marginTop: 3.25,
    marginLeft:2.59,
    position: 'absolute'
  },
  buttonCart:{
    width: 54,
    height: 36,
    marginLeft: 289,
  }
});