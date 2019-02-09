#include<iostream>
#include<algorithm>
typedef long long int ll;
using namespace std;
int main()
{
ll t;
cin>>t;
while(t--)
{
ll n,w;
cin>>n>>w;
ll arr[n];
for(ll i=0;i<n;i++)
cin>>arr[i];
sort(arr,arr+n);
ll i;
for(i=1;i<=n;)
{ if(w-arr[i-1]>=0)
    {w-=arr[i-1];
    i++;
    }
    else
    {i--;
    break;
    }
if(i>n)
{i--; break;}

}

cout<<i<<endl;

}
return 0;
}
