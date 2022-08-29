import React, {useState} from "react";
import { ImageBackground, TextInput, Image, StyleSheet, View, TouchableOpacity, Text, FlatList} from 'react-native'
import AsyncStorage from '@react-native-async-storage/async-storage';
import { CartIcon } from "../components/CartIcon";

const DataVegetable = [

  {name: 'Rau Muống', id: '1', Price: '50,000', total: '0', status: 'Raucu' },
  {name: 'Bí Đao', id: '2', Price: '70,000', total: '', status: 'Raucu'},
  {name: 'Dưa Chuột', id: '3', Price: '30,000', total: ''},
  {name: 'Rau Cải', id: '4', Price: '20,000', total: ''},
  {name: 'Rau Bột Ngọt', id: '5', Price: '20,000', total: ''},
  {name: 'Rau Lộn Xộn', id: '6', Price: '50,000', total: ''},
  {name: 'Bí Đỏ', id: '7', Price: '70,000', total: ''},
  {name: 'Cà Chua', id: '8', Price: '40,000', total: ''},
  {name: 'Cà Tím', id: '9', Price: '60,000', total: ''},
  {name: 'Cà Rốt', id: '10', Price: '30,000', total: ''},
  {name: 'Rau Cần', id: '11', Price: '20,000', total: ''},
  {name: 'Bắp Xu', id: '12', Price: '50,000', total: ''},
  {name: 'Nắm', id: '13', Price: '70,000', total: ''}
]
const typeCategory =[
  {status: 'Raucu'},
  {status: 'Thit'},
  {status: 'Haisan'},
  {status: 'TinhBot'}
]


const HomeScreen = ({ navigation }) => {
  
  state={
    textInput:[]
  }
  
  {/* addToCart */}
  const addToCart = async id => {
    let itemArray = await AsyncStorage.getItem('cartItems');
    itemArray = JSON.parse(itemArray);
    if (itemArray) {
      let array = itemArray;
      array.push(id);

      try {
        await AsyncStorage.setItem('cartItems', JSON.stringify(array));
        ToastAndroid.show(
          'Item Added Successfully to cart',
          ToastAndroid.SHORT,
        );
        navigation.navigate('Home');
      } catch (error) {
        return error;
      }
    } else {
      let array = [];
      array.push(id);
      try {
        await AsyncStorage.setItem('cartItems', JSON.stringify(array));
        ToastAndroid.show(
          'Item Added Successfully to cart',
          ToastAndroid.SHORT,
        );
        navigation.navigate('Home');

      } catch (error) {
        return error;
      }
    }
  };
  console.log(addToCart)



    const [search, setSearch] = useState('');
    
    const [total, setTotal] = useState('');


    return (
      <View>
          <View>
              <ImageBackground
              source={require('../Image/Header.png')}
              style={styles.imageBackgroud}>
              
              {/* Header */}
              <View style={styles.header}>
              <TouchableOpacity onPress={() => navigation.navigate('SignIn')}>
              <Image 
                style={styles.logo}
                source={require('../Image/Logo.png')} />
              </TouchableOpacity>
                <View style={styles.search}>
                <TouchableOpacity>
                    <Image
                            source={require('../Image/Search.png')}
                            style={styles.iconSearch}
                        />
                    </TouchableOpacity>
                    <TextInput
                        onChangeText={(text) => setSearch(text)}
                        placeholder='Nhập tên sản phẩm'
                        value={search}
                        autoCapitalize='none'
                        style={styles.searchInput}
                    />
                  </View>
              {/* <CartIcon style={styles.logoCart}/> */}
              <TouchableOpacity>
              <Image 
                style={styles.logoCart}
                source={require('../Image/addCart.png')} />
              </TouchableOpacity>
              
              </View>
              </ImageBackground>
          </View>
          {/* Switch Bar */}
          <View style={styles.swichBar}>
              <View style={styles.subject}>
                <TouchableOpacity style={styles.tabSwich} >
                    <Text style={{ fontWeight: '600', fontSize: 14, lineHeight: 17, color: 'white'}}>
                      Đặt cho giáo viên
                    </Text>
                </TouchableOpacity>
                <TouchableOpacity style={styles.tabSwich2} >
                    <Text  style={{ fontWeight: '600', fontSize: 14, lineHeight: 17, color: '#AFC68C'}}>
                      Đặt cho học sinh
                    </Text>
                </TouchableOpacity>
              </View>
          </View>


          {/* Category */}
          <View style={styles.categories} marginTop={166} padding={16}>
              <TouchableOpacity>
                <View style={styles.showCategory}>
                  <Image
                     source={require('../Image/rauqua.png')}
                     style={styles.imageCategory}/>
                  <Text style={styles.nameCategory}>
                    Rau củ quả
                  </Text>
                </View>
              </TouchableOpacity>
              <TouchableOpacity>
                <View style={styles.cropCategory}>
                  <Image
                     source={require('../Image/thit.png')}
                     style={{width: 32, height: 32, marginTop: 4}}/>
                </View>
              </TouchableOpacity>
              <TouchableOpacity>
                <View style={styles.cropCategory}>
                  <Image
                     source={require('../Image/haisan.png')}
                     style={{width: 32, height: 32, marginTop: 4}}/>
                </View>
              </TouchableOpacity>
              <TouchableOpacity>
                <View style={styles.cropCategory}>
                  <Image
                     source={require('../Image/gao.png')}
                     style={{width: 32, height: 32, marginTop: 4}}/>
                </View>
              </TouchableOpacity>
          </View>


          
          {/* Product */}
          
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
                      onPress={() => (item.isAvailable ? addToCart(DataVegetable[index][2]) : null)}
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
          
          


          
         
          


          {/* BottomTab */}
          <View style={styles.bottomtab} marginTop={760} padding={16}>
              <TouchableOpacity>
              <View style={styles.tab}>
                  <Image
                     source={require('../Image/box.png')}
                     style={styles.iconTab}/>
                  <Text style={styles.titleTab} >
                    Sản Phẩm
                  </Text>
                </View>
              </TouchableOpacity>
              <TouchableOpacity>
                <View style={styles.tab}>
                  <Image
                     source={require('../Image/Subtract.png')}
                     style={styles.iconTab}/>
                  <Text style={styles.titleTab} >
                    Đơn Hàng
                  </Text>
                </View>
              </TouchableOpacity>
              <TouchableOpacity>
                <View style={styles.tab}>
                  <Image
                     source={require('../Image/Notification.png')}
                     style={styles.iconTab}/>
                  <Text style={styles.titleTab} >
                    Thông Báo
                  </Text>
                </View>
              </TouchableOpacity>
              <TouchableOpacity>
                <View style={styles.tab}>
                  <Image
                     source={require('../Image/Profile.png')}
                     style={styles.iconTab}/>
                   <Text style={styles.titleTab}>
                    Tài Khoản
                  </Text>
                </View>
              </TouchableOpacity>
          </View>
      
      </View>
    
    );
  }

  const styles = StyleSheet.create({
    imageBackgroud: {
      margin: 0,
      height: 90,
      left: 0,
      right: 0,
      position: 'absolute',
      borderradius: 0,
      backgroundColor: 'white',
      width: '100%'
  },
  header:{
        flexDirection: 'row',
        alignItems: 'center',
        padding: 0,
        gap: 12,
        position: 'absolute',
        width: 343,
        height: 36,
        marginLeft: 16,
        marginTop: 44,
      },  
      logo:{
        width: 54,
        height: 27,
      },
      logoCart:{
        width: 30,
        height: 30,
        marginLeft: 30
      },
  search: {
        flexDirection: 'row',
        justifyContent: 'space-around',
        alignItems: 'center',
        backgroundColor: '#fff',
        borderWidth: 1,
        borderColor: '#E0E3E7',
        borderRadius: 50,
        borderWidth: 2,
        width: 211,
        height: 36,
        marginLeft: 16

    },
    iconSearch: {
        paddingTop: 6,
        height: 24,
        width: 24,
        
    },
    searchInput: {
      width: 160, 
      height: 17,
  
      fontStyle: 'normal',
      fontWeight: '400',
      fontSize: 14,
      lineheight: '120%',
      color: '#BDC4CC',
      order: 1,
    },
    swichBar:{
      flexDirection: 'column',
      justifyContent: 'center',
      alignItems: 'center',
      position: 'absolute',
      width: '100%',
      height: 72,
      marginTop: 90,
      backgroundColor: 'white'
    },
    subject: {
      flexDirection: 'row',
      alignItems: 'center',
      padding: 2,
      gap: 16,
      width: 343,
      height: 36,
      backgroundColor: '#E4ECD9',
      borderRadius: 8
    },
    tabSwich:{
      flexDirection: 'row',
      justifyContent: 'center',
      alignItems: 'center',
      paddingRight: 8,
      paddingLeft: 10,
      width: 161.5,
      height: 32,
      borderRadius: 7,
      backgroundColor: '#79A03F',
    },
    tabSwich2:{
      flexDirection: 'row',
      justifyContent: 'center',
      alignItems: 'center',
      paddingRight: 8,
      paddingLeft: 10,
      width: 161.5,
      height: 32,
      borderRadius: 7,
      backgroundColor: '#E4ECD9',
      marginLeft: 16
    },

    categories:{
      flexDirection: 'row',
      justifyContent: 'space-between',
      alignItems: 'center',
      position: 'absolute',
      width: '100%',
      height: 72,
      marginTop: 90,
      backgroundColor: 'white'
      },
   
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
    cropCategory:{
      width: 40,
      height: 40,
      borderRadius: 50,
      marginLeft: 20,
      borderRadius: 50,
      backgroundColor: '#F2F6EC',
      paddingLeft: 4,
    },
    bottomtab:{
      flexDirection: 'row',
      justifyContent: 'space-around',
      position: 'absolute',
      alignItems: 'center',
      width: '100%',
      height: 100,
      backgroundColor: 'white',
      borderWidth: 1,
      borderColor: '#F3F5F7'
      },
    tab:{
      flexDirection: 'column',  
      alignItems: 'center',
      width: 51,
      height: 54,
      backgroundColor: '#FFFFFF',
      marginBottom: 40
    },
    iconTab:{
      width: 24,
      height: 24,
      marginTop: 9.71,
    },
    titleTab:{
        width: 54, 
        height: 12,
    
        fontStyle: 'normal',
        fontWeight: '400',
        fontSize: 10,
        lineheight: 12,
        textAlign: 'center',
        color: '#8993A0',
    },
    flatList:{
      width: '90%',
      backgroundColor: 'white',
      height: 93,
      marginLeft: 20,
      flexDirection: 'column'
      },
    nameProduce:{
      width: '100%',
      height: 17,
    
      fontStyle: 'normal',
      fontWeight: '400',
      fontSize: 14,
      lineHeight: 16.8,
      color: '#253344',
      order: 1,
      marginLeft: 20
      },
  })
  export default HomeScreen;