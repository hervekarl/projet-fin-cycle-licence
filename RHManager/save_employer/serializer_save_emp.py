from rest_framework import serializers
from .models import *


class EmployerSerializer(serializers.ModelSerializer):
    url=serializers.HyperlinkedIdentityField(view_name='employerdetail', lookup_field="pk")
    class Meta:
        model = Employer
        fields="__all__"

class ServiceSerializer(serializers.ModelSerializer):
    url=serializers.HyperlinkedIdentityField(view_name='servicedetail', lookup_field="pk")
    class Meta:
        model =Service
        fields="__all__"
        
class FonctionSerializer(serializers.ModelSerializer):
    url=serializers.HyperlinkedIdentityField(view_name='fonctiondetail', lookup_field="pk")
    class Meta:
        model =FonctionsEmp
        fields="__all__"
        