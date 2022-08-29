import React, { useState } from 'react';
import {
    ImageBackground,
    Text,
    TextInput,
    View,
    TouchableOpacity,
    StyleSheet,
    Image,
}
    from 'react-native';
import { isValidUserName, isValidPassword } from '../utilies/Validation'




const SignInScreen = ({ navigation }) => {

    const [hidePass, setHidePass] = useState(true);
    const [focused, setFocused] = useState(false);

    const [errorUserName, setErrorUserName] = useState('');
    const [errorPassword, setErrorPassword] = useState('');


    const [userName, setUserName] = useState('');
    const [password, setPassword] = useState('');

    const value = password;
    const isValidationOK = () => userName.length > 0 && password.length > 0
        && isValidUserName(userName) == true
        && isValidPassword(password) == true


    return (
        <View style={styles.nen}>
        <ImageBackground
            style={styles.imageBackgroud}
            source={require('../Image/BG.png')}>
            {/* Ma Dang Nhap */}
            <View style={styles.nhaplieu}>
                <Text style={styles.textdangnhap}>Mã Đăng Nhập</Text>
                <TextInput
                    onChangeText={(text) => {
                        setErrorUserName(isValidUserName(text) == true ?
                            '' : 'Mã đăng nhập không chính xác');
                        setUserName(text);
                    }}
                    style={styles.inputTaiKhoan}
                    placeholder='Nhập Mã Đăng Nhập'
                    value={userName}
                    autoCapitalize='none'
                />
                <Text style={styles.error}>{errorUserName}</Text>

                {/* Nhap Mat Khau */}
                <Text style={styles.textmatkhau}>Mật Khẩu</Text>
                <View style={styles.inputMatKhau}>
                    <TextInput
                        onChangeText={(text) => {
                            setErrorPassword(isValidPassword(text) == true ?
                                '' : 'Mật khẩu không chính xác');
                            setPassword(text);
                        }}
                        secureTextEntry={hidePass ? true : false}
                        placeholder='Nhập Mật Khẩu'
                        value={password}
                        autoCapitalize='none'
                        style={styles.customInput}
                        onFocus={() => setFocused(true)}
                        onBlur={() => setFocused(false)}
                    />
                  

                     { value != '' && focused ? ( 
                    !hidePass ? (
                        <View style={{flexDirection: 'row', justifyContent:'space-between'}}>
                    <TouchableOpacity onPress={() => setHidePass(!hidePass)}>
                        <Image
                            source={require('../Image/Hide.png')}
                            style={styles.imageHide}
                        />
                    </TouchableOpacity>
                    <TouchableOpacity onPress={() => setPassword('')} >
                        <Image
                            source={require('../Image/clear.png')}
                            style={styles.imageClear}
                        />
                    </TouchableOpacity>
                    </View>
                    ): (
                    <View style={{flexDirection: 'row', justifyContent:'space-between'}}>
                    <TouchableOpacity onPress={() => setHidePass(!hidePass)}>
                        <Image
                            source={require('../Image/Hide.png')}
                            style={styles.imageHide}
                        />
                    </TouchableOpacity>
                    <TouchableOpacity onPress={() => setPassword('')} >
                        <Image
                            source={require('../Image/clear.png')}
                            style={styles.imageClear}
                        />
                    </TouchableOpacity>
                    </View>
                    ) ) : null}                    
                </View>
                <Text style={styles.error}>{errorPassword}</Text>
            </View>

            {/* Lien He */}

            <TouchableOpacity onPress={() => navigation.navigate('Home')}>
                <Text style={styles.lienhe}>
                    Liên hệ Davicorp nếu bạn quên tài khoản!
                </Text>
            </TouchableOpacity>
          
            {/* Button Dang Nhap */}

            <TouchableOpacity
                disabled={isValidationOK() == false}
                style={styles.dangnhap}
                onPress={() => navigation.navigate('Home')}>
                <Text style={styles.textbtt}>
                    Đăng Nhập
                </Text>
            </TouchableOpacity>
        </ImageBackground>
        </View>
    );
}

const styles = StyleSheet.create({
    nhaplieu: {
        marginTop: 250,
        flexDirection: 'column',
        justifyContent: 'center',
        width: 343,
        height: 213,
        backgroundColor: 'white',
        marginHorizontal: 25,
        borderColor: '#E0E3E7',
        borderRadius: 16,
        borderWidth: 1,
        borderStyle: 'solid'
    },
    nen: {
        flexDirection: 'column',
        width: '100%',
        height: '100%',
        backgroundColor: '#FFFFFF',
    },
    inputTaiKhoan: {
        height: 40,
        margin: 5,
        marginLeft: 15,
        marginRight: 15,
        borderWidth: 1,
        padding: 10,
        paddingVertical: 10,
        borderColor: '#E0E3E7',
        borderRadius: 7,
        borderWidth: 1,
        paddingTop: 10,
        paddingLeft: 16,
        paddingBottom: 10,
        paddingRight: 16
    },
    textdangnhap: {
        marginLeft: 15,
        
        fontStyle: 'normal',
        fontWeight: '600',
        marginTop: 20
    },
    textmatkhau: {
        marginLeft: 15,
        fontWtyle: 'normal',
        fontWeight: '600',
    },
    imageBackgroud: {
        margin: 0,
        height: 430,
        left: 0,
        right: 0,
        position: 'absolute',
        borderradius: 0,
        backgroundColor: 'white',
        width: '100%'
    },
    background: {
        backgroundColor: 'white'
    },
    lienhe: {
        marginTop: 24,
        color: '#79A03F',
        fontWeight: '400',
        fontSize: 14,
        lineheight: '120%',
        textAlign: 'center',
    },
    dangnhap: {
        marginTop: 48,
        width: 260,
        height: 40,
        fontWeight: '400',
        backgroundColor: '#79A03F',
        borderRadius: 6,
        flexDirection: 'row',
        marginHorizontal: 70
    },
    textbtt: {
        width: 93,
        height: 20,
        fontWeight: '600',
        fontsize: 16,
        lineheight: 20,
        alignitems: 'center',
        color: '#FFFFFF',
        flex: 0,
        order: 0,
        marginLeft: 90,
        marginTop: 10
    },
    error: {
        fontSize: 12,
        fontWeight: '400',
        lineheight: 15,
        color: '#F64D4D',
        marginLeft: 15,
        paddingBottom: 10
        
    },
    inputMatKhau: {
        flexDirection: 'row',
        justifyContent: 'space-between',
        alignItems: 'center',
        backgroundColor: '#fff',
        borderWidth: 1,
        borderColor: '#E0E3E7',
        borderRadius: 7,
        margin: 5,
        marginLeft: 15,
        marginRight: 15,
        height: 40,
        borderWidth: 1,
        paddingTop: 10,
        paddingLeft: 12,
        paddingBottom: 10,
        paddingRight: 12
  
    },
    imageHide: {
        padding: 10,
        margin: 5,
        height: 17,
        width: 20,
        resizeMode: 'center',
        alignItems: 'center',
        flex: 0,
        marginTop: 10
    },
    imageClear: {
        padding: 10,
        margin: 10,
        height: 17,
        width: 20,
        resizeMode: 'center',
        alignItems: 'center',
        flex: 1
    },
    customInput: {
        height: 40,
        width: 500,
        flex: 20,
        marginLeft: 5
        },

})
export default SignInScreen;


