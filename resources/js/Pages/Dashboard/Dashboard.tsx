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
            <Card className="border-primary">
              <CardHeader>
                <CardTitle className="text-primary">Total Sales</CardTitle>
              </CardHeader>
              <CardContent>
                <p className="text-2xl font-bold text-primary">
                  ${dashboardData?.totalSales || 0}
                </p>
              </CardContent>
            </Card>
            <Card className="border-primary">
              <CardHeader>
                <CardTitle className="text-primary">New Customers</CardTitle>
              </CardHeader>
              <CardContent>
                <p className="text-2xl font-bold text-primary">
                  {dashboardData?.newCustomers || 0}
                </p>
              </CardContent>
            </Card>
            <Card className="border-primary">
              <CardHeader>
                <CardTitle className="text-primary">
                  Product Categories
                </CardTitle>
              </CardHeader>
              <CardContent>
                <p className="text-2xl font-bold text-primary">
                  {dashboardData?.productCategories || 0}
                </p>
              </CardContent>
            </Card>
          </div>
          <div className="mt-8">
            <Card className="border-primary">
              <CardHeader>
                <CardTitle className="text-primary">Sales Overview</CardTitle>
              </CardHeader>
              <CardContent>
                <ResponsiveContainer width="100%" height={300}>
                  <BarChart data={dashboardData?.salesData || []}>
                    <CartesianGrid
                      strokeDasharray="3 3"
                      stroke="hsl(var(--primary))"
                    />
                    <XAxis dataKey="name" stroke="hsl(var(--primary))" />
                    <YAxis stroke="hsl(var(--primary))" />
                    <Tooltip
                      contentStyle={{
                        backgroundColor: '#fff',
                        border: '1px solid hsl(var(--primary))'
                      }}
                    />
                    <Legend wrapperStyle={{ color: 'hsl(var(--primary))' }} />
                    <Bar dataKey="sales" fill="hsl(var(--primary))" />
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
