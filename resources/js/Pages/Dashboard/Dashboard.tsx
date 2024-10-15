import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import { Card, CardContent, CardHeader, CardTitle } from '@/Components/ui/card';
import {
  BarChart,
  Bar,
  XAxis,
  YAxis,
  CartesianGrid,
  Tooltip,
  Legend,
  ResponsiveContainer
} from 'recharts';
import { useState, useEffect } from 'react';

interface DashboardData {
  totalSales: number;
  newCustomers: number;
  productCategories: number;
  salesData: Array<{ name: string; sales: number }>;
}

export default function Dashboard() {
  const [dashboardData, setDashboardData] = useState<DashboardData | null>(
    null
  );

  useEffect(() => {
    // Fetch dashboard data from an API
    const fetchDashboardData = async () => {
      // Replace with actual API call
      const response = await fetch('/api/dashboard-data');
      const data = await response.json();
      setDashboardData(data);
    };

    fetchDashboardData();
  }, []);

  return (
    <AuthenticatedLayout
      header={
        <h2 className="text-xl font-semibold leading-tight text-gray-800">
          Dashboard
        </h2>
      }
    >
      <Head title="Dashboard" />

      <div className="py-12">
        <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
          <div className="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
            <Card className="border-red-500">
              <CardHeader>
                <CardTitle className="text-red-600">Total Sales</CardTitle>
              </CardHeader>
              <CardContent>
                <p className="text-2xl font-bold text-red-700">
                  ${dashboardData?.totalSales || 0}
                </p>
              </CardContent>
            </Card>
            <Card className="border-red-500">
              <CardHeader>
                <CardTitle className="text-red-600">New Customers</CardTitle>
              </CardHeader>
              <CardContent>
                <p className="text-2xl font-bold text-red-700">
                  {dashboardData?.newCustomers || 0}
                </p>
              </CardContent>
            </Card>
            <Card className="border-red-500">
              <CardHeader>
                <CardTitle className="text-red-600">
                  Product Categories
                </CardTitle>
              </CardHeader>
              <CardContent>
                <p className="text-2xl font-bold text-red-700">
                  {dashboardData?.productCategories || 0}
                </p>
              </CardContent>
            </Card>
          </div>
          <div className="mt-8">
            <Card className="border-red-500">
              <CardHeader>
                <CardTitle className="text-red-600">Sales Overview</CardTitle>
              </CardHeader>
              <CardContent>
                <ResponsiveContainer width="100%" height={300}>
                  <BarChart data={dashboardData?.salesData || []}>
                    <CartesianGrid strokeDasharray="3 3" stroke="#ff0000" />
                    <XAxis dataKey="name" stroke="#ff0000" />
                    <YAxis stroke="#ff0000" />
                    <Tooltip
                      contentStyle={{
                        backgroundColor: '#fff',
                        border: '1px solid #ff0000'
                      }}
                    />
                    <Legend wrapperStyle={{ color: '#ff0000' }} />
                    <Bar dataKey="sales" fill="#ff0000" />
                  </BarChart>
                </ResponsiveContainer>
              </CardContent>
            </Card>
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
  );
}
