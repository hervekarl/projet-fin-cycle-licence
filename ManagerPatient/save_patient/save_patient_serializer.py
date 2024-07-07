from rest_framework import serializers
from .models import *

class PatientSerialiser(serializers.ModelSerializer):
    photo_patient=serializers.ImageField(max_length=None)
    url=serializers.HyperlinkedIdentityField(view_name='detail', lookup_field='pk')
    class Meta:
       model=Patient
       fields='__all__'