# Generated by Django 3.2.5 on 2024-07-03 12:49

from django.db import migrations


class Migration(migrations.Migration):

    dependencies = [
        ('save_employer', '0002_service_alter_fonctionsemp_table_employer'),
    ]

    operations = [
        migrations.RemoveField(
            model_name='service',
            name='responsable_service',
        ),
    ]
