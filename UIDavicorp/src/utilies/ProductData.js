const DataVegetable = [

    {name: 'Rau Muống', id: '101', Price: '50,000', total: '0', status: 'Raucu' },
    {name: 'Bí Đao', id: '102', Price: '70,000', total: '', status: 'Raucu'},
    {name: 'Dưa Chuột', id: '103', Price: '30,000', total: '', status: 'Raucu' },
    {name: 'Rau Cải', id: '104', Price: '20,000', total: '', status: 'Raucu' },
    {name: 'Rau Bột Ngọt', id: '105', Price: '20,000', total: '', status: 'Raucu' },
    {name: 'Rau Lộn Xộn', id: '106', Price: '50,000', total: '', status: 'Raucu' },
    {name: 'Bí Đỏ', id: '107', Price: '70,000', total: '', status: 'Raucu' },
    {name: 'Cà Chua', id: '108', Price: '40,000', total: '', status: 'Raucu' },
    {name: 'Cà Tím', id: '109', Price: '60,000', total: '', status: 'Raucu' },
    {name: 'Cà Rốt', id: '110', Price: '30,000', total: '', status: 'Raucu' },

  ];
  const DataMeat = [

    {name: 'Thịt Vai Heo', id: '201', Price: '50,000', total: '0',status: 'Thit' },
    {name: 'Thịt Bò', id: '202', Price: '70,000', total: '',status: 'Thit'},
    {name: 'Thịt Gà', id: '203', Price: '30,000', total: '',status: 'Thit'},
    {name: 'Thịt Vịt', id: '204', Price: '20,000', total: '',status: 'Thit'},
    {name: 'Thịt Ba Chỉ heo', id: '205', Price: '20,000', total: '',status: 'Thit'},
    {name: 'Ức Gà', id: '206', Price: '50,000', total: '',status: 'Thit'},
    {name: 'Thịt Bò Mỹ', id: '207', Price: '70,000', total: '',status: 'Thit'},
    {name: 'Đùi Gà', id: '208', Price: '40,000', total: '',status: 'Thit'},
  ];
  const DataSeaFood = [

    {name: 'Cá Ngừ', id: '301', Price: '50,000', total: '0', status: 'HaiSan' },
    {name: 'Cá Thu', id: '302', Price: '70,000', total: '', status: 'HaiSan'},
    {name: 'Tôm', id: '303', Price: '30,000', total: '', status: 'HaiSan'},
    {name: 'Cua', id: '304', Price: '20,000', total: '', status: 'HaiSan'},
    {name: 'Cá Chim', id: '305', Price: '20,000', total: '', status: 'HaiSan'},
    {name: 'Cá Rô', id: '306', Price: '50,000', total: '', status: 'HaiSan'},
    {name: 'Cá Bớp', id: '307', Price: '70,000', total: '', status: 'HaiSan'},
    {name: 'Cá Bánh Lái', id: '308', Price: '40,000', total: '', status: 'HaiSan'},
  ];
  const DataStarch = [

    {name: 'Gạo', id: '301', Price: '50,000', total: '0', status: 'TinhBot' },
    {name: 'Bột Chiên Gòn', id: '302', Price: '70,000', total: '', status: 'TinhBot'},
    {name: 'Bột Chiên Xù', id: '303', Price: '30,000', total: '', status: 'TinhBot'},
    {name: 'Gạo Lức', id: '304', Price: '20,000', total: '', status: 'TinhBot'},
    {name: 'Bột Bánh Xèo', id: '305', Price: '20,000', total: '', status: 'TinhBot'},
    {name: 'Đậu Xanh', id: '306', Price: '50,000', total: '', status: 'TinhBot'},
    {name: 'Đậu Đỏ', id: '307', Price: '70,000', total: '', status: 'TinhBot'},
    {name: 'Hạt Ngũ Cốc', id: '308', Price: '40,000', total: '', status: 'TinhBot'},
  ];
  const typeCategory =[
    {status: 'Raucu'},
    {status: 'Thit'},
    {status: 'Haisan'},
    {status: 'TinhBot'}
  ]

  export function getProducts() {
    return DataVegetable;  
  }

  export function getProduct(id) {
    return DataVegetable.find((product) => (product.id == id));  
  }