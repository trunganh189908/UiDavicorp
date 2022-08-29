import React from 'react';
import {View, Text, SafeAreaView, FlatList, Image, Touchable, TouchableOpacity, Switch} from 'react-native';

const SwitchBar = () => {
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
}

const styles = StyleSheet.create({

})
export default SwitchBar;
