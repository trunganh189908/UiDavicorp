import React from 'react';
import {View, Text, SafeAreaView, FlatList, Image} from 'react-native';

const ProductMenus = () => {
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
};


const styles = StyleSheet.create({

});

export default ProductMenus;
