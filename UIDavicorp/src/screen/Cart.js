import React, { useEffect, useState, useContext } from 'react';
import { View, Text, TouchableOpacity, FlatList, StyleSheet, TextInput } from 'react-native';
import { CartContext } from '../CartContext';

export function Cart ({navagation}) {
    const {items, getItemCount, getTotalPrice} = useContext(CartContext);
    const {notes, setNotes} = useState('');
    function Totals() {
        let [total, setTotal] = useState(0);
        useEffect(() => {
          setTotal(getTotalPrice());
        });
        return (
           <View style={styles.cartLineTotal}>
              <Text style={[styles.lineLeft, styles.lineTotal]}>Total</Text>
              <Text style={styles.lineRight}>$ {total}</Text>
           </View>
        );
      }
    function renderItem({item}) {
        return (
           <View style={styles.cartLine}>
              <Text style={styles.lineLeft}>{item.product.name} x {item.qty}</Text>
              <Text style={styles.lineRight}>$ {item.totalPrice}</Text>
              <TouchableOpacity onPress={{item}}>
                <Image source={require('../Image/Delete.png')}/>
              </TouchableOpacity>
             <View>
             <TextInput
                onChangeText={(notes) => setNotes(notes)}
                        placeholder='Ghi Chus'
                        value={notes}
                        autoCapitalize='none'
                        style={styles.notes}
              />
              <Image source={require('../Image/Edit.png')}/>
             </View>
           </View>
        );
      }
    
      return (
        <FlatList
          style={styles.itemsList}
          contentContainerStyle={styles.itemsListContainer}
          data={items}
          renderItem={renderItem}
          keyExtractor={(item) => item.product.id.toString()}
          ListFooterComponent={Totals}
        />
      );
    }
    const styles = StyleSheet.create({
      cartLine: { 
        flexDirection: 'row',
      },
      cartLineTotal: { 
        flexDirection: 'row',
        borderTopColor: '#dddddd',
        borderTopWidth: 1
      },
      lineTotal: {
        fontWeight: 'bold',    
      },
      lineLeft: {
        fontSize: 20, 
        lineHeight: 40, 
        color:'#333333' 
      },
      lineRight: { 
        flex: 1,
        fontSize: 20, 
        fontWeight: 'bold',
        lineHeight: 40, 
        color:'#333333', 
        textAlign:'right',
      },
      itemsList: {
        backgroundColor: '#eeeeee',
      },
      itemsListContainer: {
        backgroundColor: '#eeeeee',
        paddingVertical: 8,
        marginHorizontal: 8,
      },
    });