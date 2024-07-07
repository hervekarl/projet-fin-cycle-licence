from django.shortcuts import render
import requests
from rest_framework import generics
from .models import Soin
from .serializer import *
from rest_framework.response import Response