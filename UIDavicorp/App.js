import * as React from 'react';
import { NavigationContainer } from '@react-navigation/native';
import { createNativeStackNavigator } from '@react-navigation/native-stack';
import SignInScreen from './src/screen/SignInScreen';
import HomeScreen from './src/screen/FlatlistScreen';

const Stack = createNativeStackNavigator();

function App() {
  return (
    <NavigationContainer>
      <Stack.Navigator  initialRouteName="Home"  >
        <Stack.Screen options={{headerShown: false}}  name="SignIn" component={SignInScreen}  />
        <Stack.Screen options={{headerShown: false}}  name="Home" component={HomeScreen} />
      </Stack.Navigator>
    </NavigationContainer>
  );
}

export default App;