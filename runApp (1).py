
from sklearn import preprocessing
# from sklearn.preprocessing import Imputer
from sklearn.svm import SVC 
import numpy as np 
import pandas as pd 


gender_dict = {'male' : 0, 'female': 1}
cp_dict = {'asympt' : 0, 'non_anginal': 1, 'typ_angina':2, 'atyp_angina':3}
fbs_dict = {'f' : 0, 't' : 1}
restecg_dict = {'normal':0, 'left_vent_hyper':1, 'st_t_wave_abnormality':2}
exang_dict = {'yes' : 0, 'no' : 1}
slope_dict = {'up': 0, 'flat':1, 'down':2}
thal_dict = {'normal':0, 'reversable_defect':1, 'fixed_defect':2}
tr = {'1' : gender_dict, '2' : cp_dict, '5' : fbs_dict, '6' : restecg_dict, '8' : exang_dict, '10' : slope_dict, '12' : thal_dict}

# imputer = Imputer(missing_values='?', strategy='mean', axix=0)

x = pd.read_csv("x.csv") 
a = np.array(x) 
y  = a[:,13] 
x = np.column_stack((x.age,x.sex,x.cp,x.trestbps,x.chol,x.fbs,x.restecg,x.thalach,x.exang,x.oldpeak,x.slope,x.ca,x.thal)) 

clf = SVC(kernel='linear') 

for row in x:
    for col_idx in range(len(row)):
        column = row[col_idx]
        if str(col_idx) in tr:
            d = tr[str(col_idx)]
            row[col_idx] = d[row[col_idx]]


clf.fit(x, y) 


data = [[56,'male','non_anginal',130,256,'t','left_vent_hyper',142,'yes',0.6,'flat',1,'fixed_defect'],[
    44,'male','atyp_angina',120,263,'f','normal',173,'no',0,'up',0,'reversable_defect'
]]

for row in data:
    for col_idx in range(len(row)):
        column = row[col_idx]
        if str(col_idx) in tr:
            d = tr[str(col_idx)]
            row[col_idx] = d[row[col_idx]]


answer = clf.predict(data)

print(answer)
