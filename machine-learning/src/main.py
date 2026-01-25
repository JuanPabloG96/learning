# data libraries
import numpy as np 
import pandas as pd 

# machine learning libraries
import keras

dataset_path = "./datasets/chicago_taxi_train.csv"

chicago_taxi_dataset = pd.read_csv(dataset_path)

print(chicago_taxi_dataset.head())
