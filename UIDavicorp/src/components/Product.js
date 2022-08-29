import React from 'react';
import {View, Text, FlatList, Image, TouchableOpacity} from 'react-native';


const Products = () => {   
    <View style={{ marginTop: 240, height: 520}}>
    <FlatList 
    keyExtractor={DataVegetable => DataVegetable.id}
     data={DataVegetable} 
     renderItem={({item, index}) => {
      return( 
        <View style={styles.flatList} marginTop={8} padding={16}>
            <Text style={styles.nameProduce }>
              {item.name}
            </Text>
            <View style={{flexDirection: 'row', marginLeft: 8, marginTop: 20, justifyContent:'space-between'}}>
               <View style={{flexDirection: 'row', marginLeft: 8, justifyContent:'center'}} >
               <Image 
                style={{width:22, height: 20}}
                source={require('../Image/user.png')}/>
                <Text style={{fontSize: 14, fontWeight:'600', color:'black',marginTop: 2, marginLeft: 5}}>
                  {item.Price}đ
                </Text>
               </View>
               
               <View style={{flexDirection: 'row',marginRight: 25, justifyContent:'space-around'}}> 
               <TextInput
                  onChangeText={(item) => setTotal(item.total)}
                  placeholder='0,0'
                  value={total}
                  autoCapitalize='none'
                  keyboardType='number-pad'
                  style={{height: 25, width: 60, borderRadius: 4, borderColor:'#8993A0', borderWidth: 1, textAlign:'center'}}
                />
                <Text style={{fontSize:14,marginTop: 3,  fontWeight:'300', color: '#8993A0', marginLeft: 10}}>
                  kg
                </Text>
               </View>
                
                <TouchableOpacity 
                onPress={() => (item.isAvailable ? addToCart(DataVegetable[index.id]) : null)}
                >
                <Image 
                style={{width:30, height: 30}}
                source={require('../Image/plus.png')}/>
                </TouchableOpacity>
              
            </View>
      </View>
      )   
  }}/>

    </View>
    
}

const styles = StyleSheet.create({
  product:{
    flexDirection: 'row',
    alignItems: 'center',
    position: 'absolute',
    width: '100%',
    height: 86,
    backgroundColor: 'white'
    },  

  showCategory:{  
    flexDirection: 'row',
    justifyContent: 'center',
    aligItems: 'center',
    paddingLeft: 4,
    paddingRigth: 16,
    gap: 8,
    width: 154,
    height: 40,
    backgroundColor: '#F2F6EC',
    borderWidth: 1, 
    borderRadius: 50,
    borderColor: '#79A03F'
  },
  imageCategory:{
    width: 32,
    height: 32,
    marginTop: 2
  },
  nameCategory:{
    width: 82,
    height: 17,
    
    fontStyle: 'normal',
    fontWeight: '600',
    fontSize: 14,
    lineHeight: 17,
    color: '#253344',
    order: 1,
    marginTop: 11.5,
    marginLeft: 10
    },
})
export default Products;